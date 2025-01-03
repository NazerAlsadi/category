<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accordion Inside Table - Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <!-- Row with accordion trigger -->
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>
                    <button class="btn btn-link p-0" data-bs-toggle="collapse" data-bs-target="#details1" aria-expanded="false" aria-controls="details1">
                        Show Details
                    </button>
                </td>
            </tr>
            <!-- Accordion row -->
            <tr class="collapse" id="details1">
                <td colspan="3">
                    <div class="accordion" id="accordionExample1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                    Detail Section 1
                                </button>
                            </h2>
                            <div id="collapseOne1" class="accordion-collapse collapse show" aria-labelledby="headingOne1" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">
                                    This is the first detail section inside the accordion.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                    Detail Section 2
                                </button>
                            </h2>
                            <div id="collapseTwo1" class="accordion-collapse collapse" aria-labelledby="headingTwo1" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">
                                    This is the second detail section inside the accordion.
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <!-- Add more rows and accordion sections as needed -->
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
