<?php

$subject = $_POST['subject'];
$content = $_POST['content'];

?>

@extends('layouts.app')
@section('content')

 <div class="wrapper">
<h2>申請内容確認</h2>

<form action="done.php" method="post" name="form">
<input type="hidden" name="subject" value="<?php echo $subject; ?>">
<input type="hidden" name="content" value="<?php echo $content; ?>">
<table border="1">
<tr>
<td>件名</td>
<td><?php echo $_POST["subject"]; ?></td>
</tr>
<tr>
<td>内容</td>
<td><?php echo $_POST["content"]; ?></td>
</tr>
</table>

<input type="submit" value="申請" />
</form>
 </div>

 @endsection
