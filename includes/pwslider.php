<!--Script created by Nazmus at www.EasyProgramming.net-->
<!--Using .php because of value input from POST data-->
<script>
  $(function() {
    $( "#slider" ).slider(
        {
            min: 6,
            max: 100,
            value: <?php if(isset($_POST['psize'])) echo $_POST['psize']; else echo '10'; ?>,
            slide: function(event,ui)
                {
                    $("#length").val(ui.value);
                }
        });
    $("#length").val($("#slider").slider("value"));

  });
</script>
