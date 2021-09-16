<h1>Dashboard</h1>

<form id="textPost" action="<?=URL?>dashboard/xhrInsert" method="POST">
    <input id="textInput" type="text" name="text">
    <input type="submit" value="Send"><label id="postStatus"></label>
</form>

<div id="postListing"></div>