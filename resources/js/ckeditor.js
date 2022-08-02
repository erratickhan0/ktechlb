window.wysiwyg = {
    loadEditorScript: function( url, callback ) {
        var script = document.createElement("script")
        script.type = "text/javascript";
        if (script.readyState) {  // only required for IE <9
            script.onreadystatechange = function () {
                if (script.readyState === "loaded" || script.readyState === "complete") {
                    script.onreadystatechange = null;
                    callback();
                }
            };
        } else {  //Others
            script.onload = function () {
                callback();
            };
        }
        script.src = url;
        document.getElementsByTagName( "head" )[0].appendChild( script );
    },
    loadEditor: function(selector) {
        $(selector).ckeditor({
            enterMode: CKEDITOR.ENTER_BR,
            autoParagraph: false,
            allowedContent:true,
        });
    }
};

$(document).ready(function() {
    wysiwyg.loadEditorScript('//cdn.ckeditor.com/4.15.0/standard/ckeditor.js', function() {
        wysiwyg.loadEditorScript('//cdn.ckeditor.com/4.15.0/standard/adapters/jquery.js', function() {
            wysiwyg.loadEditor('textarea.wysiwyg');
        })
    });
});
