<div class="container">
            <div class="row mt-2">
                <div class="col-sm-3 col-md-3">
                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Your dishes" aria-label="Search"
                                aria-describedby="button-addon2" name="name">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>

                        </div>
                    </form>
                </div>
                <div class="col-sm-7 col-md-7"></div>
                <div id="filter-box" class="col-sm-2 col-md-2">
                    <select id="sort-box" class="form-select" aria-label="Default select example"
                        onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <option selected>Price Sorting</option>
                        <option value="?field=price&sort=asc">Ascending</option>
                        <option value="?field=price&sort=desc">Descending</option>
                    </select>
                </div>
            </div>
        </div>