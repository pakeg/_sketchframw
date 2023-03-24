<?php $this->theme->header(); ?>

    <div class="container" id="main_block">
        <div class="row">
            <div class="page-title">
                <h1>Pages</h1>
                <a href="/admin/pages/create">
                    <button type="button" class="btn btn-secondary">Create page</button>
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
<?php $this->theme->footer(); ?>       