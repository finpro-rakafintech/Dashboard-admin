<div class="main-content">
    <section class="section">
        <h2 class="mb-4">Tambah Data Nasabah</h2>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="create_nasabah" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="firstname">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lastname">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_id">User ID - Full Name</label>
                                            <input type="text" id="searchUser" class="form-control" placeholder="Search User">
                                            <select class="form-control" name="user_id" id="userDropdown">
                                                <option value="">Select a User</option>
                                                <?php foreach ($users as $user) : ?>
                                                    <option value="<?= $user->user_id; ?>">
                                                        <?= $user->user_id; ?> - <?= $user->fullname; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control" name="nik">
                                        </div>

                                        <button class="btn btn-success mr-1" type="submit">Submit</button>
                                        <button class="btn btn-warning" type="reset">Reset</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No. Kredit</label>
                                            <input type="text" class="form-control" name="no_kredit">
                                        </div>
                                        <div class="form-group">
                                            <label>NPWP</label>
                                            <input type="text" class="form-control" name="npwp">
                                        </div>
                                        <div class="form-group">
                                            <label>Income</label>
                                            <input type="text" class="form-control" name="income">
                                        </div>
                                        <div class="form-group">
                                            <label>Outcome</label>
                                            <input type="text" class="form-control" name="outcome">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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