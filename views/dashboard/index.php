<h1>Dashboard</h1>

<form id="textPost" action="<?=URL?>dashboard/xhrInsert" method="POST">
    <div class="form-group w-25">
        <input class="form-control" id="textInput" placeholder="What's on you mind?" type="text" name="text">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Post">
        <label class="text-danger" id="postStatus"></label>
    </div>
</form>

<hr class="bg-info">

<div id="postListing">
    <h2>Posts</h2>
</div>