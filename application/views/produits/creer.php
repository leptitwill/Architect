			<?php echo validation_errors(); ?>
			<?php echo $error;?>
<?php echo form_open_multipart('produits/upload'); ?>

    <label for="nom">nom</label>
    <input type="input" name="nom" /><br />

    <label for="description">description</label>
    <textarea name="description"></textarea><br />

	<label for="userfile">userfile</label>
    <input type="file" name="userfile" size="20" />

    <input type="submit" name="submit" value="Create news item" />

</form>