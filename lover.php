<html lang="en">
<head>
<title>ACE in Action</title>
<style type="text/css" media="screen">
    #editor {

        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 50%;
        height: 50%;
    }
</style>
</head>
<body>
<br>
<br>
<br>

<div class="">
  <div id="editor" class="editor">
    function foo(items) {
      var x = "All this is syntax highlighted";
      return x;
  }
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.5/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/javascript");
    editor.getSession().setUseWrapMode(true);
</script>
</body>
</html>
