<?php

namespace App;

use Exception;
use GuzzleHttp\Client;
use InvalidArgumentException;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Application as IlluminateApplication;

/**
 * Extends \Illuminate\Foundation\Application to override some defaults.
 */
class Application extends IlluminateApplication
{
    /**
     * Current Portfolio version. Must start with a v, and is synced with git tags/releases.
     *
     * @link https://github.com/eldorplus/portfolio/releases
     */
    const VERSION = 'v0.1.1';

    /**
     * Loads a revision'ed asset file, making use of gulp-rev
     * This is a copycat of L5's Elixir, but catered to our directory structure.
     *
     * @param string $file
     * @param string $manifestFile
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
     public function rev($file, $manifestFile = null)
     {
         static $manifest;

         $manifestFile = $manifestFile ?: $this->publicPath().'/mix-manifest.json';

         if (!$manifest) {
             if (! file_exists($manifestPath = $manifestFile)) {
                 throw new InvalidArgumentException('The Mix manifest does not exist.');
             }
             $manifest = json_decode(file_get_contents($manifestPath), true);
         }

         if (!starts_with($file, '/')) {
             $file = "/{$file}";
         }

         if (!array_key_exists($file, $manifest)) {
             throw new InvalidArgumentException(
                 "Unable to locate Mix file: {$file}. Please check your ".
                 'webpack.mix.js output paths and try again.'
             );
         }

         return file_exists(public_path('/hot'))
             ? new HtmlString("http://localhost:8080{$manifest[$file]}")
             : new HtmlString($this->staticUrl("public{$manifest[$file]}"));
     }

    /**
     * Get a URL for static file requests.
     * If this installation of Koel has a CDN_URL configured, use it as the base.
     * Otherwise, just use a full URL to the asset.
     *
     * @param string $name The additional resource name/path.
     *
     * @return string
     */
    public function staticUrl($name = null)
    {
        $cdnUrl = trim(config('app.cdn.url'), '/ ');

        return $cdnUrl ? $cdnUrl.'/'.trim(ltrim($name, '/')) : trim(asset($name));
    }

    /**
     * Get the latest version number of Portfolio from GitHub.
     *
     * @param Client $client
     *
     * @return string
     */
    public function getLatestVersion(Client $client = null)
    {
        if ($v = cache('latestPortfolioVersion')) {
            return $v;
        }

        $client = $client ?: new Client();

        try {
            $v = json_decode($client->get('https://api.github.com/repos/eldorplus/portfolio/tags')->getBody())[0]->name;
            // Cache for one day
            cache(['latestPortfolioVersion' => $v], 1 * 24 * 60);

            return $v;
        } catch (Exception $e) {
            Log::error($e);

            return self::VERSION;
        }
    }
}
