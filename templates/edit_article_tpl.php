<?php if (!empty ($article)):?>
    <p style="float: right;"><a href="<?php echo generate_link_url ($article->getAbsoluteUrl ()) ?>">View on Site</a><br/></p>
    <div id="breadcrumb_trail"><p><a href="article_options.php">Article Options</a> &gt; Edit</p></div>
    <h3>Edit Article</h3>
    <?php include joinPath ("fragments", "form_errors_tpl.php"); ?>
    <p>Use the form below to edit a article.</p>
    <form action="" method="post">
    <ul>
        <li><label <?php if (!empty ($form_errors["title"])): ?>class="error" <?php endif ?>for="title">Title:</label><input type="text" name="title" id="title" value="<?php echo full_escape ($form_values["title"]) ?>" /></li>
        <li><label <?php if (!empty ($form_errors["content"])): ?>class="error" <?php endif ?>for="content">Content:</label><textarea rows="20" cols="70" name="content" id="content"><?php echo full_escape ($form_values["content"]) ?></textarea></li>
        <li><label <?php if (!empty ($form_errors["postDate"])): ?>class="error" <?php endif ?> for="postDate">Post Date:</label> <input type="text" name="postDate" id="postDate" readonly="readonly" value="<?php echo $form_values["postDate"] ?>" /> <input type="button" id="calendar-trigger" value="..." /></li>
        <li><label class="optional<?php if (!empty ($form_errors["updateDate"])): ?>error <?php endif ?>" for="updateDate">Update Date:<span class="sub_text">* optional</span></label> <input type="text" name="updateDate" id="updateDate" readonly="readonly" value="<?php echo $form_values["updateDate"] ?>" /> <input type="button" id="calendar-trigger-ni" value="..." /></li>
        <li><label <?php if (!empty ($form_errors["published"])): ?>class="error" <?php endif ?>for="published">Published:</label><select name="published" id="published"><option value="false"<?php if ($form_values["published"] == "false") echo "selected=\"selected\""; ?>>False</option><option value="true"<?php if ($form_values["published"] == "true") echo "selected=\"selected\""; ?>>True</option></select></li>
        <li><label <?php if (!empty ($form_errors["tags"])): ?>class="error" <?php endif ?>for="tags">Tags:</label><input type="text" name="tags" id="tags" value="<?php echo full_escape ($form_values["tags"]) ?>" /><p class="help_text">Space-separated string (ex: ssf4 blazblue tekken6)</p></li>
        <li><input type="hidden" id="id" name="id" value="<?php echo full_escape ($form_values["id"]); ?>" /></li>
        <li class="submit"><input type="submit" value="Submit" /></li>
    </ul>
    </form>
    <?php include (joinPath ("fragments", "tinymce_tpl.php")); ?>
    <?php $dateField = "postDate"; include (joinPath ("fragments", "jscal2_tpl.php")); ?>
    <?php $trigger = "calendar-trigger-ni"; $dateField = "updateDate"; include (joinPath ("fragments", "jscal2_tpl.php")); ?>
    <p><a href="<?php echo generate_link_url ("delete_article.php?id={$article->id}") ?>">Delete</a></p>
<?php else: ?>
    <div id="breadcrumb_trail"><p><a href="article_options.php">Article Options</a> &gt; Edit</p></div>
    <h3>Edit Article</h3>
    <p>Article not found</p>
<?php endif ?>
