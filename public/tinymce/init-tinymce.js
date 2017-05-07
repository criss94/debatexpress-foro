/*tinymce.init({
    selector:"textarea.tinymce",

    /* theme of the editor */
    /*theme: "modern",
    skin: "lightgray",

    /* width and height of the editor */
/*    width: "100%",
    height: 200,

    /* display statusbar */
/*    statubar: true,

    /* plugin */
/*    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
    ],

    /* toolbar */
/*    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",

    /* style */
/*    style_formats: [
        {title: "Headers", items: [
            {title: "Header 1", format: "h1"},
            {title: "Header 2", format: "h2"},
            {title: "Header 3", format: "h3"},
            {title: "Header 4", format: "h4"},
            {title: "Header 5", format: "h5"},
            {title: "Header 6", format: "h6"}
        ]},
        {title: "Inline", items: [
            {title: "Bold", icon: "bold", format: "bold"},
            {title: "Italic", icon: "italic", format: "italic"},
            {title: "Underline", icon: "underline", format: "underline"},
            {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
            {title: "Superscript", icon: "superscript", format: "superscript"},
            {title: "Subscript", icon: "subscript", format: "subscript"},
            {title: "Code", icon: "code", format: "code"}
        ]},
        {title: "Blocks", items: [
            {title: "Paragraph", format: "p"},
            {title: "Blockquote", format: "blockquote"},
            {title: "Div", format: "div"},
            {title: "Pre", format: "pre"}
        ]},
        {title: "Alignment", items: [
            {title: "Left", icon: "alignleft", format: "alignleft"},
            {title: "Center", icon: "aligncenter", format: "aligncenter"},
            {title: "Right", icon: "alignright", format: "alignright"},
            {title: "Justify", icon: "alignjustify", format: "alignjustify"}
        ]}
    ]
});*/


/*tinymce.init({
    selector: 'textarea.tinymce',
    height: 200,
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime table contextmenu paste code'
    ],
    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link video',
    content_css: '//www.tinymce.com/css/codepen.min.css',
    file_browser_callback: function(field, url, type, win) {
        tinymce.activeEditor.windowManager.open({
            file: 'kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    }
});*/


/* este es el que va al publicar el tema ,full package*/
/*tinymce.init({
    selector: 'textarea.tinymce',
    height: 200,
    theme: 'modern',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
    ],
    toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor | codesample',
    image_advtab: true,
    templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ],
    file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    }
});
*/

//este es para responder
/*tinymce.init({
    selector: 'textarea.comentario',
    height: 200,
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime table contextmenu paste code'
    ],
    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    content_css: '//www.tinymce.com/css/codepen.min.css',
    file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    }
});*/

/* editor para los comentarios */
tinymce.init({
    selector: 'textarea.comentario',
    width: "100%",
    height: 150,
    theme: 'modern',
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen emoticons textcolor colorpicker',
        'insertdatetime media table contextmenu paste code'
    ],
    //toolbar: 'undo redo | bold italic  link image | alignleft aligncenter alignright alignjustify | bullist numlist | media | forecolor backcolor emoticons | codesample',
    toolbar: 'undo redo | styleselect | bold italic forecolor backcolor emoticons | bullist numlist outdent indent | link image',
    image_advtab: true,
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ],
    file_browser_callback: function(field, url, type, win) {
        tinymce.activeEditor.windowManager.open({
            file: '/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    }
});

/* editor para editar el comentario */
tinymce.init({
    selector: 'textarea.editarcomentario',
    height: 200,
    theme: 'modern',
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen emoticons textcolor colorpicker',
        'insertdatetime media table contextmenu paste code'
    ],
    //toolbar: 'undo redo | bold italic  link image | alignleft aligncenter alignright alignjustify | bullist numlist | media | forecolor backcolor emoticons | codesample',
    toolbar: 'undo redo | styleselect | bold italic forecolor backcolor emoticons | bullist numlist outdent indent | link image',
    image_advtab: true,
    templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ],
    file_browser_callback: function(field, url, type, win) {
        tinymce.activeEditor.windowManager.open({
            file: '/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    }
});