<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myCalendar</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/libaries/bootstrapv5.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/libaries/evo-calendar/css/evo-calendar.min.css">
    <link rel="stylesheet" href="assets/custom.css">
</head>
<body>

<!--<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">myCalendar</a>
        <button type="button" class="btn btn-secondary">Secondary</button>
    </div>
</nav>-->

<div class="container">
    <div class="row">
        <div class="col -entry">
        </div>
    </div>
</div>
<div class="my-5">
    <div class="js-render-popup">
        <button class="js-add fs-1 dropdown -primary-color"
                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">+
        </button>
        <div class="dropdown-menu">
            <div class="px-4 py-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <textarea class="form-control -form-textarea" id="note"></textarea>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date">
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="time">
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" id="type">
                </div>
                <button type="submit" class="btn text-white -primary-color js-submit">Save</button>
            </div>
        </div>
    </div>
    <div class="" id="calendar"></div>
</div>


<script src="assets/libaries/jquery-3.6.0.min.js"></script>
<script src="assets/libaries/evo-calendar/js/evo-calendar.min.js"></script>
<script src="assets/libaries/bootstrapv5.1/js/bootstrap.bundle.min.js"></script>

<script type="module">
    $('#calendar').evoCalendar({})

    import App from "./app.js";

    (new App()).run();

</script>
</body>
</html>