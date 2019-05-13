
<?php phpinfo(); ?><form method="post" action="cargar.php" enctype="multipart/form-data">
	<div class="dz-message">
        <div class="icon">
            <i class="fa fa-cloud-upload"></i>
        </div>
        <h2>Release your files here.</h2>
        <span class="note">There are no files</span>
    </div>
    <div class="fallback">
        <input type="file" name="file" multiple>
    </div>
    <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
</form>