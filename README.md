ACF Page Builder
================

A page builder module for Wordpress themes, built upon the ACF plugin (http://www.advancedcustomfields.com) by Elliot Condon. This module allows users to create any layout they like for each page template that it is installed upon.

## Installation

First, clone this direcory to the root of your theme. Then add this line to your page template:

```
<?php include (TEMPLATEPATH . '/page-builder/pb-layouts.php' ); ?>
```

Next, add this line into 'functions.php':

```
<?php require_once('page-builder/pb-functions.php'); ?>
```

Finally, import 'acf-import.json' to the ACF plugin, and make sure the field group is set to display on the correct page template. Head over to one of the pages that is running your selected template and you should see the page builder interface.

## Requirements

If you don't have these it's not going to work:

1. **EITHER** [ACF v5 pro](https://github.com/AdvancedCustomFields/acf5-beta) (currently in beta, please play by the rules) **OR** [ACF v4](http://www.advancedcustomfields.com) with all premium add-ons installed (must be purchased).
2. jQuery

It is recommended that you use this with my [Starter Theme](https://github.com/jsengstrom/blank-wp-theme) and Codekit 2. It will work without, but you may need to change a few file paths to get it up and running.

## Plugin Copyrights and Licenses

This module relies upon external products (ACF and various JS plugins) in order to do it's thing.
Make sure you know and understand the license for each of these modules. Just be cool.

* * *

Tweet me for support [@jsengstrom](https://twitter.com/jsengstrom).