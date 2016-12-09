@extends('master')
@section('title')
	Admin: View log file
@endsection
@section('content')
<a href="index.php"> &laquo Back</a>
<h2>Log</h2>

<div id="log"><?php echo nl2br($log_content);?>
</div>

<li><a href="clear_log.php?clear=true">Clear Log</a></li> 
</div>
@endsection('content')