@if(session('msg'))
  <script>
    alert('<?php echo(session('msg')) ?>')
  </script>
@endif