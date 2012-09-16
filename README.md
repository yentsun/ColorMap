This class was designed to convert string color names like *'yellow'* into entities with all the tech properties needed to display the color (hex-code, rgb, cmyk). It uses a [csv map](https://github.com/yentsun/ColorMap/blob/master/map.csv) as reference. The map contains **950+** colors.

**Note. Only Russian color names are currently supported! English support is scheduled.**

What is it for?
---------------

This class can be handy in a an application, where colors are stored by names only and visual color samples needed.

Usage
-----

Install the class by issuing ```git clone git://github.com/yentsun/ColorMap.git``` in some folder your project
has access to and then:

```php
<?php

require 'ColorMap/Color.php';

$color = new Color('Белый');

print $color->clean_name; // белый
print $color->hsv; // 0,0,100
print $color->rgb; // 255,255,255
print $color->cmyk; // 0,0,0,0
print $color->hex; // FFFFFF
```