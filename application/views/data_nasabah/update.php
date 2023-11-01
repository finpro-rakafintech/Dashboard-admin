<div class="main-content">
    <section class="section">
        <h2 class="mb-4">Edit Data Nasabah</h2>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url('update_nasabah'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" class="form-control" name="nasabah_id" value="<?php echo $nasabah_id; ?>">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number" value="<?php echo $phone_number ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_id">User ID - Full Name</label>
                                            <input type="text" id="searchUser" class="form-control" placeholder="Search User by ID or Name">
                                            <select class="form-control" name="user_id" id="userDropdown">
                                                <option value=""></option>
                                                <?php foreach ($users as $user) : ?>
                                                    <option value="<?=$user->user_id; ?>" <?php if ($user->user_id == $user_id) echo "selected"; ?>>
                                                        <?=$user->user_id; ?> - <?=$user->fullname; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control" name="nik" value="<?php echo $nik; ?>">
                                        </div>

                                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                                        <button class="btn btn-warning" type="reset">Reset</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No. Kredit</label>
                                            <input type="text" class="form-control" name="no_kredit" value="<?php echo $no_kredit; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>NPWP</label>
                                            <input type="text" class="form-control" name="npwp" value="<?php echo $npwp; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Income</label>
                                            <input type="text" class="form-control" name="income" value="<?php echo $income; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Outcome</label>
                                            <input type="text" class="form-control" name="outcome" value="<?php echo $outcome; ?>">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<script>
    // Get the search input and user dropdown element
    const searchInput = document.getElementById("searchUser");
    const userDropdown = document.getElementById("userDropdown");

    // Store all the options in an array
    const options = Array.from(userDropdown.options);

    // Add an input event listener to the search input
    searchInput.addEventListener("input", function() {
        const searchText = searchInput.value.toLowerCase();

        // Filter the options based on the search input
        const filteredOptions = options.filter(option => {
            const text = option.text.toLowerCase();
            return text.includes(searchText);
        });

        // Clear the dropdown and add the filtered options
        userDropdown.innerHTML = "";
        filteredOptions.forEach(option => {
            userDropdown.appendChild(option.cloneNode(true));
        });
    });
</script>