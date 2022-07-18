<?php $this->extend('template/layout') ?>

<?php $this->section('tittle') ?>
Inicio
<?php $this->endSection() ?>

<?php $this->section('content') ?>
<div class="card-content">
    <div class="row row-content">
        
        <div class="col-md-4">
            <div class="main-card">
                <div class="row">
                    <div class="col-md-3"><h1>5</h1></div>
                    <div class="col-md-9">Seguimientos pendientes</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="main-card">
            <div class="row">
                    <div class="col-md-3"><h1>5</h1></div>
                    <div class="col-md-9">Casos urgentes</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="main-card">
            <div class="row">
                    <div class="col-md-3"><h1>5</h1></div>
                    <div class="col-md-9">Otros</div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $this->endSection() ?>