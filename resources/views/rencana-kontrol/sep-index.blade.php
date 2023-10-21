<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h5><code>Fungsi : Melihat data SEP untuk keperluan rencana kontrol</code></h5>
        </div>

        <div class="card" style="margin-top: -20px;">
            <div class="card-body">
                <form action="" method="get" id="filter-form">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 p-1">
                            <div class="form-group mb-0">
                                <label>Masukan No SEP.</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col- col-sm-3  p-1">
                            <div class="form-group mt-4 mb-0">
                                <button class="btn btn-primary mt-2 mb-0" type="submit">
                                    Cari
                                </button>
                                <button class="btn btn-danger mt-2 mb-0" type="reset" name="reset" id="reset-button">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
