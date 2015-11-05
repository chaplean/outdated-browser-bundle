Getting Started With Chaplean Outdated Browser Bundle
=====================================================

# 1. Add me in AppKernel

app/AppKernel.php:
```php
...
    /**
     * @return array
     */
    public function registerBundles()
    {
        return array(
            ...
            new Chaplean\Bundle\OutdatedBrowserBundle\ChapleanOutdatedBrowserBundle(),
        );
    }
...
```

# 2. Define config (Optionnal)

app/config/config.yml:
```yaml
# default option
chaplean_outdated_browser:
    background_color: '#f25648'
    color: '#ffffff'
    lower_than: 'transform'
    template: 'ChapleanOutdatedBrowserBundle:Template:outdated.html.twig'
```

`lower_than` can take:

* "IE11","borderImage"
* "IE10", "transform" (Default property)
* "IE9", "boxShadow"
* "IE8", "borderSpacing"

# 3. Update assetic

Add this bundle in assetic config:
```yaml
assetic:
    bundles: ['ChapleanOutdatedBrowserBundle']
```

# 4. Add routes

Include a routing in global routing

app/config/routing.yml:
```yaml
chaplean_cookie_bundle:
    resource: "@ChapleanOutdatedBrowserBundle/Resources/config/routing.yml"
    prefix:   /
```

# 5. Add script in layout

In layout html add me simply:

Version unminified:
```html
<script type="text/javascript" src="{{ path('chaplean-outdated-browser.js') }}"></script>
```

Version minified:
```html
<script type="text/javascript" src="{{ path('chaplean-outdated-browser.min.js') }}"></script>
```