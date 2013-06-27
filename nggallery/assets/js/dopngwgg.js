/*
* Title                   : Wall/Grid Gallery (WordPress NextGEN Gallery Template)
* Version                 : 1.3
* File                    : dopngwgg.js
* File Version            : 1.0
* Created / Last Modified : 05 May 2012
* Author                  : Dot on Paper
* Copyright               : © 2012 Dot on Paper
* Website                 : http://www.dotonpaper.net
* Description             : Wall/Grid Gallery Front End Scripts.
*/

jQuery(document).ready(function(){
    jQuery('.DOPNextGENWallGridGallery').each(function(){// Search for gallery containers.
        jQuery(this).DOPNextGENWallGridGallery();
    });
});