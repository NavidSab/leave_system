@extends('email::leave.layouts.master') @section('content')
<!-- BEGIN BODY -->
<table
    align="center"
    role="presentation"
    cellspacing="0"
    cellpadding="0"
    border="0"
    width="100%"
    style="margin: auto;">
    <tr>
        <td valign="top" class="bg_light" style="padding: .5em 2.5em 1em 2.5em;">
            <table
                role="presentation"
                border="0"
                cellpadding="0"
                cellspacing="0"
                width="100%">
                <tr>
                    <td class="logo" style="text-align: center;">
                        <h1>
                            <a href="#">{{ config('app.name') }}</a>
                        </h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- end tr -->
    <tr>
        <td
            valign="middle"
            class="hero bg_white"
            style="background-image: url({{ config('email.leave.image') }}); background-size: cover; height: 400px;">
            <div class="overlay"></div>
            <table>
                <tr>
                    <td>
                        <div class="text" style="padding: 0 4em; text-align: center;">
                            <p>
                                <a href="{{ config('email.leave.url.home') }}" class="btn btn-primary">{{ config('email.leave.btn_text') }}</a>
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- end tr -->
    <td class="bg_dark email-section" style="text-align:center;">
        <div class="heading-section heading-section-white">
            <h2>
                {{ config('email.leave.title') }}</h2>
            <table class="rwd-table bg_dark">
                <tr>
                    <th>Person</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Department</th>
                    <th>Approve</th>
                    <th>Reject</th>
                </tr>
                <tr>
                    <td data-th="Person">{{ $email->name }}</td>
                    <td data-th="From">{{ $email->from_date }}</td>
                    <td data-th="To">{{ $email->to_date }}</td>
                    <td data-th="Department">{{ $email->department }}</td>
                    <td data-th="Approve">
                        <a href="https://leave.king.graphics/email/leaveConfirm/{{ $email->type }}/{{ $email->code }}/1" class="btn btn-primary">
                            Approve
                        </a>
                    </td>
                    <td data-th="Reject">
                        <a href="https://leave.king.graphics/email/leaveConfirm/{{ $email->type }}/{{ $email->code }}/0" class="btn btn-black">
                            Reject
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </td>
</tr>
<!-- end: tr -->
</table>
<table
align="center"
role="presentation"
cellspacing="0"
cellpadding="0"
border="0"
width="100%"
style="margin: auto;">
<tr>
    <td valign="middle" class="bg_light footer email-section">
        <table>
            <tr>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                    <table
                        role="presentation"
                        cellspacing="0"
                        cellpadding="0"
                        border="0"
                        width="100%">
                        <tr>
                            <td style="text-align: left; padding-right: 10px;">
                                <h3 class="heading">About</h3>
                                <p>{{ config('email.leave.about') }}</p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td valign="top" width="33.333%" style="padding-top: 20px;">
                    <table
                        role="presentation"
                        cellspacing="0"
                        cellpadding="0"
                        border="0"
                        width="100%">
                        <tr>
                            <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                                <h3 class="heading">Contact Info</h3>
                                <ul>
                                    <li>
                                        <span class="text">{{ config('email.leave.contact.location') }}</span></li>
                                    <li>
                                        <span class="text">{{ config('email.leave.contact.phone') }}</span></a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </td>
            <td valign="top" width="33.333%" style="padding-top: 20px;">
                <table
                    role="presentation"
                    cellspacing="0"
                    cellpadding="0"
                    border="0"
                    width="100%">
                    <tr>
                        <td style="text-align: left; padding-left: 10px;">
                            <h3 class="heading">Useful Links</h3>
                            <ul>
                                <li>
                                    <a href="{{ config('email.leave.url.home') }}">Home</a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</td>
</tr>
<!-- end: tr -->
<tr>
<td class="bg_white" style="text-align: center; padding-top: 20px;">
    <p>{{ config('email.leave.footer')  }}</p>
</td>
</tr>
</table>
@endsection