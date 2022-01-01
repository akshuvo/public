<?php include_once 'header.php';?>
<div class="container">

    <div class="mt-4 p-5 mb-4">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Search Donations</h1>
            <p class="col-md-8 fs-4 mb-5">Here you can find donations by location</p>

            <form class="align-items-center bg-body d-flex p-4 shadow" method="post">
                <div class="input-group input-group-lg me-3">
                    <input id="push-geo-location" type="text" class="form-control border-end-0" name="location" placeholder="Enter your full address">
                    <a id="get-current-location" class="bg-body input-group-text" title="Autofill your current location"><i class="bi bi-geo-alt"></i></a>
                </div>
                <button class="btn btn-lg btn-primary w-25" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2>Change the background</h2>
          <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
          <button class="btn btn-outline-light" type="button">Example button</button>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Add borders</h2>
          <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
          <button class="btn btn-outline-secondary" type="button">Example button</button>
        </div>
      </div>
    </div>
</div>
<?php include_once 'footer.php';?>