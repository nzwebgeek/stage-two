<form action="upload-media.php"
      method="POST"
      enctype="multipart/form-data">
<h1>Media Upload</h1>
<label>Select Image</label>

<input
type="file"
name="image"
accept="image/jpeg,image/png,image/webp"
required>


<label>Alt Text</label>

<input
type="text"
name="alt_text"
maxlength="255">


<button class="button" type="submit">
Upload
</button>

</form>
<br>

<a href="media-library.php">
View Media Library
</a>