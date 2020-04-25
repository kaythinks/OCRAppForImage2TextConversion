{{ include('layouts/header.php') }}

<h5>OCR App built with KayPHP</h5>

<section id="cover" style="padding-top: 20px;"> 
<div id="cover-caption">
    <div id="container" class="container" style="padding-top: 20px;">
        <div class="row text-white">
            <div class="col-sm-6 offset-sm-3 text-center">
                {% if error  %}
                    <p>{{ error }}</p>
                {% endif %}
                <h3>Enter Image !</h3>
                <div class="info-form">
                    <form class="form-inlin justify-content-center" method="post" action="/ocr" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="sr-only">Picture</label>
                            <input type="file" class="form-control" name="picture" placeholder="Enter Picture" required>
                            <input type="hidden" name="csrf_token" value="{{ csrf_token }}"> 
                        </div>
                        <button type="submit" class="btn btn-success ">Convert</button>
                    </form>
                </div>
                <br>
                {% if info  %}
                <a class="btn btn-danger" href="">Reset</a>
                <br>
                    <span class="centre">{{ info }}</span> 
                <br>
                    <img class="centre" src="{{ pix }}" width="200px;">
                {% endif %}
            </div>
        </div>
    </div>
</div>
</section>

{{ include('layouts/footer.php') }}
</body>
</html>

