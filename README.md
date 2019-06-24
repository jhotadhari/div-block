WordPress Plugin Div Block

Just a simple div Block. Nothing else.

> Plugin readme: [./dist/trunk/README.md](https://github.com/jhotadhari/div-block/tree/master/dist/trunk)

# Download and install

~~**Div Block** is [available in the official WordPress Plugin repository](https://wordpress.org/plugins/div-block/). You can install this plugin the same way you'd install any other plugin.~~

To install it from zip file, [download latest release](https://github.com/jhotadhari/div-block/releases/latest).

# Development

Clone the repository and make it your current working directory.

```
# Install npm dependencies
npm install

# Install composer dependencies
composer install --profile -v

# Build into `./test_build`
grunt build
```

> This Plugin is based on [generator-wp-dev-env](https://github.com/croox/generator-wp-dev-env). See `generator.version` in `package.json`.
>
> Read the [documentation](https://github.com/croox/generator-wp-dev-env#documentation) for further development information.

#### Dev dependencies

- `node` and `npm`
- `yo` and `generator-wp-dev-env`
- `composer`
- `git`
- `grunt`  and  `grunt-cli`
- `rsync`
- `xgettext`
- `convert` from ImageMagick. Tested with ImageMagick `6.8.9-9`

# Support and feedback

* [Create a new issue on Github](https://github.com/jhotadhari/div-block/issues/new)
* ~~[Add a new topic to WP's support forum](https://wordpress.org/support/plugin/div-block)~~
* ~~[Create a new review and rate this Plugin](https://wordpress.org/support/plugin/div-block/reviews/#new-post)~~
