<?php $this->theme->header(); ?>

    <div class="container" id="main_block">
        <div class="row">
            <div>
                <h1>Create page</h1>
            </div>
            <div>
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" type="text" class="form-control" id="content" placeholder="content"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php $this->theme->footer(); ?>       