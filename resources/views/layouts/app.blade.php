<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <nav class="container mt-4">
        
        <div class="d-flex flex-row justify-content-sm-between">
            
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="/tahun_akademik/create" class="btn btn-info btn-sm nav-link">New Tahun Ajaran+</a>
                </li>
                
                <li class="nav-item mb-2">
                    <a href="/tahun_akademik/0/tahun" class="btn btn-info btn-sm nav-link">Tahun Ajaran</a>
                </li>
        
                <li class="nav-item mb-2">
                    <a href="/kelompok_mata_pelajaran/create" class="btn btn-primary btn-sm nav-link">New Kelompok Mata Pelajaran+</a>
                </li>
        
                <li class="nav-item mb-2">
                    <a href="/kelompok_mata_pelajaran" class="btn btn-primary btn-sm nav-link">Kelompok Mata Pelajaran</a>
                </li>
        
                <li class="nav-item mb-2">
                    <a href="/mata_pelajaran/create" class="btn btn-danger btn-sm nav-link">New Mata Pelajaran+</a>
                </li>
        
                <li class="nav-item mb-2">
                    <a href="/mata_pelajaran" class="btn btn-danger btn-sm nav-link">Mata Pelajaran</a>
                </li>
            
            </ul>

            <ul class="nav flex-column"></ul>

            <ul class="nav flex-column">
                
                <li class="nav-item mb-2">
                    <a href="/guru/create" class="btn btn-danger btn-sm nav-link">New Guru+</a>
                </li>

                <li class="nav-item mb-2">
                    <a href="/guru" class="btn btn-danger btn-sm nav-link">Daftar Guru</a>
                </li>
                
                @php
                    $from_nav = 1;    
                @endphp
        
                <li class="nav-item mb-2">
                    <a href="/guru_mata_pelajaran/create/0/{{ $from_nav }}" class="btn btn-danger btn-sm nav-link">Atur Mata Pelajaran Guru+</a>
                </li>
        
                <li class="nav-item mb-2">
                    <a href="/tahun_akademik/1/tahun" class="btn btn-info btn-sm nav-link">Daftar Kelas</a>
                </li>
        
                <li class="nav-item mb-2">
                    <a href="/siswa/create" class="btn btn-danger btn-sm nav-link">New Siswa+</a>
                </li>
        
                <li class="nav-item mb-2">
                    <a href="/tahun_akademik/2/tahun" class="btn btn-danger btn-sm nav-link">Daftar Siswa</a>
                </li>
            </ul>

            <ul class="nav flex-column"></ul>

            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="/kelas_siswa" class="btn btn-sm btn-info">Atur Kelas Siswa</a>
                </li>
            </ul>

            <ul class="nav flex-column"></ul>
        </div>
        
       

    </nav>

    <main>
        @yield('content')
    </main>
    
</body>
</html>