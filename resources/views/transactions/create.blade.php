@extends('layouts.app')

@section('content')
<div class="container" style="max-width:600px;margin-top:50px;">
    <h3 class="mb-4 text-center">Tambah Transaksi</h3>
    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <div class="mb-3">
            <label for="customer_id" class="form-label">Nama Pelanggan</label>
            <select class="form-select" id="customer_id" name="customer_id" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="invoice_number" class="form-label">No. Invoice</label>
            <input type="text" class="form-control" id="invoice_number" name="invoice_number" value="{{ old('invoice_number') }}" required>
            @error('invoice_number')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="total_amount" class="form-label">Total</label>
            <input type="number" class="form-control" id="total_amount" name="total_amount" value="{{ old('total_amount') }}" required>
            @error('total_amount')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Lunas</option>
                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Batal</option>
            </select>
            @error('status')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea class="form-control" id="notes" name="notes" rows="2">{{ old('notes') }}</textarea>
            @error('notes')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Simpan</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary w-100 mt-2">Kembali</a>
    </form>
</div>
@endsection 