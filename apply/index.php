<!doctype html>
<html lang="en">

<head>
    <title>Ninja Kudeta | Apply Candidate</title>
    <link rel="icon" type="image/x-icon" href="images/fav.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    <style>
        .form-row {
            flex-wrap: unset;
        }
    </style>

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Ninja Kudeta | Apply Candidate</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(images/bg-1.png);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Register your Character</h3>
                                </div>

                            </div>
                            <form action="login.php" onSubmit="return validasi()" method="post" id="insert_form">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Nickname</label>
                                        <input type="text" name="nick" id="nick" class="form-control" placeholder="Nickname" />

                                    </div>
                                    <div class="form-group col-6">
                                        <label>ID Char</label>
                                        <input type="number" name="charid" id="charid" class="form-control" placeholder="Char ID" />
                                    </div>


                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Token <img src="images/token.png" width="15px"></label>
                                        <input type="number" name="token" id="token" class="form-control" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Onigiri <img src="images/onigiri.png" width="15px"></label>
                                        <input type="number" name="onigiri" id="onigiri" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-6">
                                        <label for="discord">Discord <img src="images/discord.png" width="15px"></label>
                                        <input type="text" class="form-control" id="discord" name="discord" placeholder="Discord">
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="nowa">Whatsapp <img src="images/wa.png" width="15px"></label>
                                        <input type="text" class="form-control" id="nowa" name="nowa" placeholder="Nomor Whatsapp">
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label>Player</label>
                                        <select name="pchp" id="pchp" class="form-control">
                                            <option value="PC">PC User</option>
                                            <option value="Android">Android</option>
                                            <option value="Unknown Player">Unknown Player</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Macro</label>
                                        <select name="macro" id="macro" class="form-control">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <option value="Unknown Macro">Unknown Macro</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" name="insert" id="insert" value="Insert" class="form-control btn btn-primary rounded submit px-3">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#insert_form').on("submit", function(event) {
                event.preventDefault();
                if ($('#nick').val() == "") {
                    alert("Mohon Isi Nickname ");
                } else if ($('#charid').val() == '') {
                    alert("Mohon Isi Char ID");
                } else {
                    $.ajax({
                        url: "register.php",
                        method: "POST",
                        data: $('#insert_form').serialize(),
                        beforeSend: function() {
                            $('#insert').val("Inserting");
                        },
                        success: function(data) {
                            $('#insert_form')[0].reset();
                            alert(data);
                            window.location.href = 'thanks.php';
                        }
                    });
                }
            });
        });
        //End Aksi Delete Data
    </script>
</body>

</html>