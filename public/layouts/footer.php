    </div>
    <div id="footer">Copyright <?php echo date("Y", time()); ?>, Donald Okwuone</div>
  </body>
</html>
<?php if(isset($connection)) { $connection->close_connection(); } ?>