/*
 Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
 */
        CKEDITOR.addTemplates("default", {
            imagesPath: CKEDITOR.getUrl(CKEDITOR.plugins.getPath("templates") + "templates/images/"),
            templates: [
                {
                    title: "Image and Title",
                    image: "template1.gif",
                    description: "One main image with a title and text that surround the image.",
                    html: '<h3><img src=" " alt="" style="margin-right: 10px" height="100" width="100" align="left" />Type the title here</h3><p>Type the text here</p>'
                },
                {
                    title: "Strange Template",
                    image: "template2.gif",
                    description: "A template that defines two colums, each one with a title, and some text.",
                    html: '<table cellspacing="0" cellpadding="0" style="width:100%" border="0"><tr><td style="width:50%"><h3>Title 1</h3></td><td></td><td style="width:50%"><h3>Title 2</h3></td></tr><tr><td>Text 1</td><td></td><td>Text 2</td></tr></table><p>More text goes here.</p>'
                }, 
                {
                    title: "Кликабельное изображение",
//                    image: "template2.gif",
                    description: "Добавляет кликабельное изображение.",
                    html: '<a href="images/photos/img-blog.jpg" class="fancybox thumbnail light-bg margin-bottom" title=""><img src="images/photos/img-blog.jpg" alt=""><span class="thumbnail-arrow light-color active-border"><i class="icon-zoom-in"></i></span></a>'
                }, 
                {
                    title: "avtor",
//                    image: "template2.gif",
                    description: "Добавляет .",
                    html: '<div class="clear-before"></div><div class="blog-author middle-color clearfix"><a class="fancybox thumbnail light-bg blog-author-photo" style="border:0" href="/userfiles/files/Sootvetstvie-ds1-ds2-ds3.jpg"><img class="with-shadow" src="/userfiles/images/Sootvetstvie-ds1-ds2-ds3--150.jpg" />&nbsp;</a><div class="blog-author-info"><div style="font-size:20px;margin-bottom: 15px;font-weight: bold;color: darkslategrey;" class="middle-color subheader-font">TITLE</div><p>Vestibulum sodales ante a purus volutpat euismod. Proin sodales quam nec ante sollicitudin lacinia. Ut egestas bibendum tempor. Morbi non nibh sit amet ligula blandit ullamcorper in nec risus.Pellentesque fringilla diam faucibus tortor bibendum vulputate. Etiam turpis urna, rhoncus et mattis ut, dapibus eu nunc. Nunc sed aliquet nisi. Nullam ut magna non lacus adipiscing</p></div></div><div class="clear-before"></div>'
                }, 
                {
                    title: "Кликабельное изображение с подписью снизу, ширина 150px",
//                    image: "template2.gif",
                    description: "Добавляет кликабельное изображение.",
                    html: '<div class="middle-color" style="float: left;  margin: 5px; width: 150px;"><a class="fancybox thumbnail light-bg " href="/userfiles/files/1.jpg"  title=""><img alt="Фаворит двери" src="/userfiles/images/DS1-win-min(1).jpg" /> <span class="thumbnail-arrow light-color active-border"><i class="icon-zoom-in"></i></span> </a><div style="font-size: 10px;text-align: center;">Текст</div></div>'
                }, 
                {
                    title: "Кликабельное изображение с подписью снизу, ширина 100px",
//                    image: "template2.gif",
                    description: "Добавляет кликабельное изображение.",
                    html: '<div class="middle-color" style="float: left;  margin: 5px; width: 100px;"><a class="fancybox thumbnail light-bg " href="/userfiles/files/1.jpg"  title=""><img alt="" src="/userfiles/images/DS1-win-min(1).jpg" /> <span class="thumbnail-arrow light-color active-border"><i class="icon-zoom-in"></i></span> </a><div style="font-size: 10px;text-align: center;">Текст</div></div>'
                }, 
                {
                    title: "Цитата с красной полоской",
//                    image: "template2.gif",
                    description: "Цытата.",
                    html: '<blockquote class="middle-color active-border margin-bottom">Proin sodales quam nec ante sollicitudin lacinia. Ut egestas bibendum tempor. Morbi non nibh sit amet ligula blandit ullamcorper in nec risus.</blockquote>'
                }, 
                {
                    title: "Тест с лентой слева",
//                    image: "template2.gif",
                    description: "Лента",
                    html: '<div class="grid-100 margin-bottom"><div class="tip dark-color light-bg"><span class="tip-ribbon">&nbsp;</span><p><strong>Can we help you?</strong> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry  standard dummy text ever since the 1500s, when an unknown printer took a galley o </p></div></div>'
                }, 
                {
                    title: "Text and Table",
                    image: "template3.gif",
                    description: "A title with some text and a table.",
                    html: '<div style="width: 80%"><h3>Title goes here</h3><table style="width:150px;float: right" cellspacing="0" cellpadding="0" border="1"><caption style="border:solid 1px black"><strong>Table title</strong></caption><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table><p>Type the text here</p></div>'
                }
            ]
        });