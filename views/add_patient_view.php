<html>

<head>
    <title>Insert Update Delete Data using Codeigniter</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <br /><br /><br />
        
        <h3 align="center">HOPITAL E2N</h3><br />
        <form method="post" action="<?php echo base_url() ?>add_patient/form_validation">
            <?php
            // On charge la library Form_validation
            $this->load->library('form_validation');

            // On verifie si l'url contient le segment 2 pour adapté le message
            if ($this->uri->segment(2) == "inserted") {
                //base url - http://localhost/tutorial/codeigniter  
                //redirect url - http://localhost/tutorial/codeigniter/main/inserted  
                //main - segment(1)  
                //inserted - segment(2)  
                echo '<p class="text-success">Data Inserted</p>';
            }
            if ($this->uri->segment(2) == "updated") {
                echo '<p class="text-success">Data Updated</p>';
            }
            ?>
            <!-- form -->
            <?php
            if (isset($user_data)) {
                foreach ($user_data->result() as $row) {
            ?>
                    <div class="form-group">
                        <label>Prénom : </label>
                        <input type="text" name="firstname" value="<?php echo $row->firstname; ?>" class="form-control" />
                        <span class="text-danger"><?php echo form_error("firstname"); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Nom : </label>
                        <input type="text" name="lastname" value="<?php echo $row->lastname; ?>" class="form-control" />
                        <span class="text-danger"><?php echo form_error("lastname"); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Date de naissance : </label>
                        <input type="text" name="birthdate" value="<?php echo $row->birthdate; ?>" class="form-control" />
                        <span class="text-danger"><?php echo form_error("birthdate"); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Numéro de téléphone : </label>
                        <input type="text" name="phone" value="<?php echo $row->phone; ?>" class="form-control" />
                        <span class="text-danger"><?php echo form_error("phone"); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Adresse Mail : </label>
                        <input type="text" name="mail" value="<?php echo $row->mail; ?>" class="form-control" />
                        <span class="text-danger"><?php echo form_error("mail"); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />
                        <input type="submit" name="update" value="Mettre a jour" class="btn btn-info" />
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="form-group">
                    <label>Prénom : </label>
                    <input type="text" name="firstname" class="form-control" />
                    <span class="text-danger"><?php echo form_error("firstname"); ?></span>
                </div>

                <div class="form-group">
                    <label>Nom : </label>
                    <input type="text" name="lastname" class="form-control" />
                    <span class="text-danger"><?php echo form_error("lastname"); ?></span>
                </div>
                <div class="form-group">
                    <label>Date de naissance : </label>
                    <input type="text" name="birthdate" class="form-control" />
                    <span class="text-danger"><?php echo form_error("birthdate"); ?></span>
                </div>
                <div class="form-group">
                    <label>Numéro de téléphone : </label>
                    <input type="text" name="phone" class="form-control" />
                    <span class="text-danger"><?php echo form_error("phone"); ?></span>
                </div>
                <div class="form-group">
                    <label>Adresse mail : </label>
                    <input type="text" name="mail" class="form-control" />
                    <span class="text-danger"><?php echo form_error("mail"); ?></span>
                </div>

                <div class="form-group">
                    <input type="submit" name="insert" value="Creer" class="btn btn-info" />
                </div>
            <?php
            }
            ?>
        </form>
        <br /><br />

        <!-- Tableau --> 
        <h3>Liste des patients : </h3><br />
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Tel</th>
                    <th>Mail</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
                <?php
                if ($fetch_data->num_rows() > 0) {
                    foreach ($fetch_data->result() as $row) {
                ?>
                        <tr>
                            <td><?php echo $row->firstname; ?></td>
                            <td><?php echo $row->lastname; ?></td>
                            <td><?php echo $row->birthdate; ?></td>
                            <td><?php echo $row->phone; ?> </td>
                            <td><?php echo $row->mail; ?></td>
                            <!-- Bouton Suppr et Del -->
                            <td><a href="#" class="delete_data" id="<?php echo $row->id; ?>">Supprimer</a></td>
                            <td><a href="<?php echo base_url(); ?>add_patient/update_data/<?php echo $row->id; ?>">Modifier</a></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <!-- Message si table vide -->
                        <td colspan="5">No Data Found</td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <script>
            
            $(document).ready(function() {
                $('.delete_data').click(function() {
                    var id = $(this).attr("id");
                    if (confirm("Are you sure you want to delete this?")) {
                        window.location = "<?php echo base_url(); ?>add_patient/delete_data/" + id;
                    } else {
                        return false;
                    }
                });
            });
        </script>
    </div>
</body>

</html>