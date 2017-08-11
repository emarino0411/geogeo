<section class="hero is-fullheight is-default is-bold post-form" style="display: none;">
    <div class="container" style="width: 90%; margin-top: 30px;">
        <p>No login required, be free and share!</p><br>

        <form method="POST" action="/save">
            {{ csrf_field() }}

        <div class="field">
            <label class="label">Title</label>
            <div class="control">
                <input class="input" type="text" placeholder="Title of your post" name="title" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Type of post</label>
            <div class="control">
                <div class="select">
                    <select name="type" class="blog-type" required>
                        <option value="">please select</option>
                        <option value="blog">blog</option>
                        <option value="photo">photo</option>
                        <option value="video">video</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="field blog-field" style="display: none;">
            <label class="label">Type of post</label>
            <div style="background-color: #fff; padding: 10px;">
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
            </div>
        </div>
        <div class="field video-field" style="display: none;">
            <label class="label">Youtube URL</label>
            <div class="control">
                <input name="url" class="input" type="text" placeholder="URL to your video">
            </div>
        </div>
        <div class="field photo-field" style="display: none;">
            <label class="label">Photo</label>
            <div class="control">
                <input name="file" type="file" accept="image/*"/>
            </div>
        </div>
        <a class="button is-dark is-pulled-right write">Cancel</a>
        <button class="button is-success is-pulled-left">save</button>
        </form>


    </div>
</section>