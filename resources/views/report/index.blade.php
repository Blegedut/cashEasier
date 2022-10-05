@extends('layouts.master')

@section('content')
    <div class="page-heading">
        <h3>Pemasukan</h3>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="#" class="btn btn-success rounded-pill">Export to excel</a>
            <a href="#" class="btn btn-danger rounded-pill">Export to pdf</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Date</th>
                        <th>Customer name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>09-14-2022</td>
                        <td>arul</td>
                        <td>
                            <a class="btn btn-info"  href={{ url('report/detail') }}>Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
