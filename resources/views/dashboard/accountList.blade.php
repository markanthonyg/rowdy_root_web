@extends('layouts.dashboard.master')

@section('title')
  EMRS Online | Account Request
@endsection

@section('style')
  <!-- Datatables CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/media/css/dataTables.bootstrap.css">

  <!-- Datatables Editor Addon CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css">

  <!-- Datatables ColReorder Addon CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">

  <!-- CSS For clickable row -->
  {{ Html::style('css/clickable_row.css') }}
@endsection

@section('breadcrumb')
  <li class="crumb-active">
    <a href="/">Dashboard</a>
  </li>
  <li class="crumb-icon">
    <a href="/">
      <span class="glyphicon glyphicon-home"></span>
    </a>
  </li>
  <li class="crumb-link">
    <a href="/accountRequest">Account Requests</a>
  </li>

@endsection


@section('content')
  {{-- Root container --}}
  <div class="container">
    <div class="row">
      {{-- Table to list out accounts in --}}
      <div id="accountTable" class="table-responsive">
        {{-- Custom Vue component to list each patient in $patients --}}
        <my-account-list :accounts='{{ json_encode($accounts) }}'></my-account-list>
      <div class="col-md-12 text-center">
        <ul class="pagination pagination-lg pager" id="patientListPager"></ul>
      </div>
    </div>
  </div>
@endsection

{{-- Template for my-account-list --}}
<template id="my-account-list-template">
  <table class="table table-hover table-striped">
    <thead>
      {{-- Table row for headings --}}
      <tr>
        <th>Account ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>D.O.B</th>
        <th>Gender</th>
        <th></th>
      </tr>
    </thead>
    {{-- For every account in accounts property, list out details for that account in a row --}}
    <tbody>
      <tr v-for="account in accounts">
        <td v-if="account">@{{ account.id }}</td>
        <td v-if="account">@{{ account.first_name }}</td>
        <td v-if="account">@{{ account.last_name }}</td>

        {{-- D.O.B if condition here --}}
        <td v-if="account">@{{ account.dob }}</td>

        <td v-if="account">@{{ account.gender }}</td>

        {{-- Buttons to email, edit, and delete for each account --}}
        <td>
          <a href="#" data-toggle="tooltip" title="View Profile" v-if="account.role == 'patient'"><span id="show-modal" v-on:click="goTo(account)" class="glyphicon glyphicon-blackboard" aria-hidden="true"></span></a>

          <a href="#" data-toggle="tooltip" title="Email Record"><span id="show-modal" v-on:click="sendEmailModal(account)" class="glyphicon glyphicon-send" aria-hidden="true"></span></a>

          <a href="#" data-toggle="tooltip" title="Edit Record"><span id="show-modal" v-on:click="showEditModal(account)" class="glyphicon glyphicons-remove-circle" aria-hidden="true"></span></a>

          <a href="#" data-toggle="tooltip" title="Delete Record"><span v-on:click="removeAccount(account)" class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span></a>


        </td>
      </tr>
      <!-- use the modal component, pass in the prop -->
      <record-modal :account.sync="toBeEdited" :show.sync="showRecordModal"></record-modal>
      <email-modal :account.sync="toBeEdited" :show.sync="showEmailModal"></email-modal>
    </div>
    </tbody>
  </table>
</template>

{{-- Vue CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"></script>

{{-- Vue Resource CDN --}}
{{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.9.3/vue-resource.js') }}

{{-- Vue Scripts --}}
{{ HTML::script('js/accountTable.js') }}
