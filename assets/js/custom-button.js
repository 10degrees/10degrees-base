(function() {
    tinymce.create("tinymce.plugins.custom_button", {

        init : function(ed, url) {

            ed.addButton("custom_button", {
                title : "Insert button link",
                type: 'button',
                image : url + '/../img/custom-button.png',
                onclick: function() {
                    ed.windowManager.open( {
                        title: 'Button Details',
                        body: [
                            {
                                type: 'textbox',
                                name: 'link',
                                label: 'Insert link here.',
                                value: 'http://www.example.com'
                            },
                            {
                                type: 'listbox',
                                name: 'button_style',
                                label: 'Select button style',
                                'values': [
                                    {text: 'Default', value: 'button'},
                                    // {text: 'Red Button', value: 'button--red'},
                                ],
                            },
                            {
                                type: 'textbox',
                                name: 'linkText',
                                label: 'Insert button text here.',
                                value: 'Click here'
                            },
                            {
                                type: 'checkbox',
                                name: 'newTab',
                                label: 'Open link in new tab?',
                                value: ''
                            }

                        ],
                        onsubmit: function( e ) {

                            if( e.data.newTab ) {
                                var target = "target='_blank'";
                            } else {
                                var target = "";
                            }

                            var html = "<a class='" + e.data.button_style + "' " + target + " href='" + e.data.link + "'>" + e.data.linkText + "</a>";
                            
                            ed.insertContent(html);

                        }
                    });
                }
            });

        }

    });

    tinymce.PluginManager.add("custom_button", tinymce.plugins.custom_button);
})();
