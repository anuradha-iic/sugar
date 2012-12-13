<?php

class AOS_ProductsViewPopup extends ViewPopup {

    function AOS_ProductsViewPopup() {

        parent::ViewPopup();
    }

    function display() {


        parent::display();

        echo <<<EQQ
        <script type='text/javascript'>
           
              function getProductGrid(id){
                    productId = id;
                    YUI().use('node','io',function (Y){
                    url = 'index.php?module=AOS_Products&action=get_grid&to_pdf=1&proid='+productId;
                   // alert(url)
                    var cfg ={
                     on:{
                          complete:function(id,o){
                            show_grid(o.responseText)
                            }
                        }
                    };
                    Y.io(url,cfg);
                    });
                 
                //show_grid('value of product id='+productId)
                }

function show_grid(Text){

overlib(Text
        , STICKY
        , MOUSEOFF
        ,400
        ,WIDTH
        , 400
        , LEFT
        ,CAPTION
        ,'<div style=\'float:left\'>Grid Pricing</div>'
        , CLOSETEXT
        , '<div style=\'float: right\'><img border=0 style=\'margin-left:2px; margin-right: 2px;\' src=themes/Sugar5/images/close.gif?s=a5e911b1ddb8d577583fb40c57e66122&c=1></div>'
        ,CLOSETITLE
        , SUGAR.language.get('app_strings', 'LBL_SEARCH_HELP_CLOSE_TOOLTIP')
        , CLOSECLICK
        ,FGCLASS
        , 'olFgClass'
        , CGCLASS
        , 'olCgClass'
        , BGCLASS
        , 'olBgClass'
        , TEXTFONTCLASS
        , 'olFontClass'
        , CAPTIONFONTCLASS
        , 'olCapFontClass');
        return ;

if(typeof(dialog) != 'undefined')
                 dialog.destroy();
                dialog = new YAHOO.widget.SimpleDialog('fdfd',
                        {
                            width: 600,
                            visible: true,
                            draggable: true,
                            close: true,
                            text: Text,
                            //constraintoviewport: true,
                            xy:[200,400]
                          });

                    dialog.setHeader('Grid Pricing');
                    dialog.setBody('');
                    dialog.setFooter('');
                    dialog.render(document.body);
                    dialog.show();

}



            </script>
EQQ;
    }

}
?>

