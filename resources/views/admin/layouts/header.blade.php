
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title }}</title>
  
  <!-- icon -->
  <link rel="icon" href="{{ asset('storage/') }}/{{ session('memlogo') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- w3school -->
  <link rel="stylesheet" href="{{ asset('assets/admin/w3schools/w3.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">
  <!-- summernote bs4 -->
  {{-- <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.css') }}"> --}}
  <!-- summernote bs5 -->
  {{-- <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote-bs5.min.css') }}"> --}}
  <!-- style-ku -->
  <link rel="stylesheet" href="{{ asset('assets/style-ku/css/style-ku.css') }}">
  <script src="{{ asset('assets/style-ku/js/style-ku.js') }}"></script>
 
<!-- jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bootstrap-5.2.3-dist -->
{{-- <script src="{{ asset('assets/admin/plugins/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js') }}"></script> --}}
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/admin/plugins/toastr/toastr.min.js') }}"></script>
<!-- ckeditor4 -->
<script src="{{ asset('assets/admin/plugins/ckeditor4/ckeditor.js') }}"></script>
<!-- ckeditor5 -->
{{-- <script src="{{ asset('assets/admin/plugins/ckeditor5-build-classic/ckeditor.js') }}"></script> --}}

<!-- ckeditor5 super-build-->
{{-- <script src="{{ asset('assets/admin/plugins/ckeditor5-super-build/ckeditor.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/admin/plugins/ckeditor5-super-build/ckeditor.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/admin/plugins/ckeditor5-build-classic/app.js') }}"></script> --}}

<!-- ckeditor5 super-all-free-plugins-->
{{-- <script src="{{ asset('assets/admin/plugins/ckeditor5-all-free-plugins/ckeditor.js') }}"></script> --}}

<!-- ckeditor5 feature-rich -->
{{-- <link rel="stylesheet" href="{{ asset('assets/admin/plugins/ckeditor5-feature-rich/styles.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('assets/admin/plugins/ckeditor5-feature-rich/styles-extra.css') }}"> --}}
{{-- <script src="{{ asset('assets/admin/plugins/ckeditor5-feature-rich/main.js') }}"></script> --}}

<!-- controlsidebar -->
<script src="{{ asset('assets/admin/build/js/ControlSidebar.js') }}"></script>

<!-- summernote bs4 -->
{{-- <script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
<!-- summernote bs5 -->
{{-- <script src="{{ asset('assets/admin/plugins/summernote/summernote-bs5.min.js') }}"></script> --}}




<!-- jQuery-ui -->
<script src="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>  
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.css') }}">

<!-- select2 -->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
<script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>



<script>

 const app_ckeditor5 = {
    
 }
  // This sample still does not showcase all CKEditor 5 features (!)
  // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
  
  const formatckeditor5 = {
      // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
      
      
      
      toolbar: {
              items: [
                  'exportPDF','exportWord', '|',
                  'findAndReplace', 'selectAll', '|',
                  'heading', '|',
                  'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                  'bulletedList', 'numberedList', 'todoList', '|',
                  'outdent', 'indent', '|',
                  'undo', 'redo',
                  '-',
                  'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                  'alignment', '|',
                  'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                  'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                  'textPartLanguage', '|',
                  'sourceEditing'
                  
              ],
              shouldNotGroupWhenFull: true
          },

          

          // Changing the language of the interface requires loading the language file using the <script> tag.
          // language: 'es',
          list: {
              properties: {
                  styles: true,
                  startIndex: true,
                  reversed: true
              }
          },
          // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
          heading: {
              options: [
                  { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                  { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                  { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                  { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                  { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                  { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                  { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
              ]
          },
          // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
          placeholder: 'Welcome to CKEditor 5!',
          // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
          fontFamily: {
              options: [
                  'default',
                  'Arial, Helvetica, sans-serif',
                  'Courier New, Courier, monospace',
                  'Georgia, serif',
                  'Lucida Sans Unicode, Lucida Grande, sans-serif',
                  'Tahoma, Geneva, sans-serif',
                  'Times New Roman, Times, serif',
                  'Trebuchet MS, Helvetica, sans-serif',
                  'Verdana, Geneva, sans-serif'
              ],
              supportAllValues: true
          },
          // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
          fontSize: {
              options: [ 10, 12, 14, 'default', 18, 20, 22 ],
              supportAllValues: true
          },
          // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
          // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
          htmlSupport: {
              allow: [
                  {
                      name: /.*/,
                      attributes: true,
                      classes: true,
                      styles: true
                  }
              ]
          },
          // Be careful with enabling previews
          // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
          htmlEmbed: {
              showPreviews: true
          },
          // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
          link: {
              decorators: {
                  addTargetToExternalLinks: true,
                  defaultProtocol: 'https://',
                  toggleDownloadable: {
                      mode: 'manual',
                      label: 'Downloadable',
                      attributes: {
                          download: 'file'
                      }
                  }
              }
          },
          // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
          mention: {
              feeds: [
                  {
                      marker: '@',
                      feed: [
                          '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                          '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                          '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                          '@sugar', '@sweet', '@topping', '@wafer'
                      ],
                      minimumCharacters: 1
                  }
              ]
          },
          // The "super-build" contains more premium features that require additional configuration, disable them below.
          // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
          removePlugins: [
              // These two are commercial, but you can try them out without registering to a trial.
              // 'ExportPdf',
              // 'ExportWord',
              'CKBox',
              'CKFinder',
              'EasyImage',
              // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
              // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
              // Storing images as Base64 is usually a very bad idea.
              // Replace it on production website with other solutions:
              // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
              // 'Base64UploadAdapter',
              'RealTimeCollaborativeComments',
              'RealTimeCollaborativeTrackChanges',
              'RealTimeCollaborativeRevisionHistory',
              'PresenceList',
              'Comments',
              'TrackChanges',
              'TrackChangesData',
              'RevisionHistory',
              'Pagination',
              'WProofreader',
              // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
              // from a local file system (file://) - load this site via HTTP server if you enable MathType
              'MathType'
          ]
  }


</script>





</head>
