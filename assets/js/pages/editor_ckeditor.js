/* ------------------------------------------------------------------------------
*
*  # CKEditor editor
*
*  Specific JS code additions for editor_ckeditor.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {

    // Full featured editor
    var editor = CKEDITOR.replace( 'editor-full', {
        height: ((editorsmall==true) ? '100px' : '200px' ),
        extraPlugins: 'forms',
        baseHref : "http://polres.dev/"
    });

    var editor = CKEDITOR.replace( 'editor-ku', {
        height: ((editorsmall==true) ? '100px' : '200px' ),
        extraPlugins: 'forms',
        baseHref : "http://polres.dev/"
    });




    CKEDITOR.replaceClass = 'editor-full';
    CKEDITOR.replaceClass = 'editor-ku';


    // Readonly editor
    // ------------------------------

    /*// Setup
    var editor = CKEDITOR.replace('editor-readonly', {
        height: '400px'
    });

    // The instanceReady event is fired, when an instance of CKEditor has finished its initialization.
    CKEDITOR.on('instanceReady', function (ev) {

        // Show this "on" button.
        document.getElementById('readOnlyOn').style.display = '';

        // Event fired when the readOnly property changes.
        editor.on('readOnly', function() {
            document.getElementById('readOnlyOn').style.display = this.readOnly ? 'none' : '';
            document.getElementById('readOnlyOff').style.display = this.readOnly ? '' : 'none';
        });
    });

    // Toggle state
    function toggleReadOnly(isReadOnly) {
        editor.setReadOnly(isReadOnly);
    }
    document.getElementById('readOnlyOn').onclick=function(){ toggleReadOnly() }
    document.getElementById('readOnlyOff').onclick=function(){ toggleReadOnly(false) }



    // Enter key configuration
    // ------------------------------

    // Define editor
    var editor2;

    // Setup editor
    function changeEnter() {
        // If we already have an editor, let's destroy it first.
        if (editor2)
            editor2.destroy(true);

        // Create the editor again, with the appropriate settings.
        editor2 = CKEDITOR.replace('editor-enter', {
            height: '400px',
            extraPlugins: 'enterkey',
            enterMode: Number(document.getElementById('xEnter').value),
            shiftEnterMode: Number(document.getElementById('xShiftEnter').value)
        });
    }

    // Run on indow load
    window.onload = changeEnter;

    // Change configuration
    document.getElementById('xEnter').onchange=function(){changeEnter()}
    document.getElementById('xShiftEnter').onchange=function(){changeEnter()}

    // We are using Select2 selects here
    $('.select').select2({
        minimumResultsForSearch: '-1'
    })



    // Inline editor
    // ------------------------------

    // We need to turn off the automatic editor creation first
    CKEDITOR.disableAutoInline = true;

    // Attach editor to the area
    var editor3 = CKEDITOR.inline('editor-inline');*/

    editor.on('focus', function (event)
    {
               showToolBarDiv( event );
     });
    // Call hideToolBarDiv() when editor loses the focus
    editor.on('blur', function (event)
    {
               hideToolBarDiv( event );
    });




    if(editorsmall==true){
        editor.config.toolbar = [
                ['Styles','Format','Font','FontSize','Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print','NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Image','Table','-','Link','Smiley','TextColor','BGColor',],
        ] ;
    }



    //Whenever CKEditor get focus. We will show the toolbar DIV.
     function showToolBarDiv( event )
     {
      // Select the correct toolbar DIV and show it.
      //'event.editor.name' returns the name of the DIV receiving focus.
        $('#'+event.editor.name+'TBdiv').show();
         $('#'+event.editor_2.name+'TBdiv').show();
     }

     //Whenever CKEditor loses focus, We will hide the corresponding toolbar DIV.
     function hideToolBarDiv( event )
     {
        // Select the correct toolbar DIV and hide it.
        //'event.editor.name' returns the name of the DIV receiving focus.
        $('#'+event.editor.name+'TBdiv').hide();
        $('#'+event.editor_2.name+'TBdiv').hide();
     }

});
