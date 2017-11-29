<div class="container">
<form action="find-book.php" method="GET" name="find-book">
<h3>Find your book</h3>
<div class="row">
<div class="col-md-3 form-group">
<h5>Search by Keyword</h5>
<input name="keyword" type="text" placeholder="Enter Keyword" class="form-control">
</div>

<div class="col-md-3 form-group">
<h5>Filter by Genre</h5>
<select name="genre" class="form-control">
<option value="">Select Genre</option>
<?php foreach($content_genre as $genre) { ?>
<option value="<?php echo array_search($genre, $content_genre); ?>"><?php echo $genre; ?></option>
<?php } ?>
</select>
</div>

<div class="col-md-3 form-group">
<h5>Filter by Language</h5>
<select name="language" class="form-control">
<option value="">Select Language</option>
<?php foreach($content_language as $language) { ?>
<option value="<?php echo array_search($language, $content_language); ?>"><?php echo $language; ?></option>
<?php } ?>
</select>
</div>

<div class="col-md-3"><h5>&nbsp;</h5> <button type="submit" name="submit" class="btn btn-secondary btn-block">Find</button></div>
</div>
</form>
</div>