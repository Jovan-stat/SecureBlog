<section>
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 1rem; font-weight: 700; color: var(--danger);">Hapus Akun</h2>
        <p style="font-size: 13px; color: var(--ink-muted); margin-top: 3px;">
            Setelah akun dihapus, semua data akan dihapus permanen. Unduh data penting sebelum melanjutkan.
        </p>
    </div>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        style="padding: 10px 24px; background: #fef2f2; border: 1px solid #fecaca; border-radius: 9999px;
               font-size: 14px; font-weight: 600; color: var(--danger); cursor: pointer;">
        Hapus Akun
    </button>

    {{-- Modal konfirmasi --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div style="padding: 2rem;">
            <h2 style="font-size: 1rem; font-weight: 700; color: var(--ink); margin-bottom: 8px;">
                Yakin ingin menghapus akun?
            </h2>
            <p style="font-size: 13px; color: var(--ink-muted); margin-bottom: 1.5rem; line-height: 1.6;">
                Semua data akan dihapus secara permanen. Masukkan password untuk konfirmasi.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div style="margin-bottom: 1.25rem;">
                    <label for="password"
                           style="display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px;">
                        Password
                    </label>
                    <input id="password" name="password" type="password"
                           placeholder="Masukkan password kamu"
                           style="width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 10px;
                                  font-size: 14px; color: var(--ink); background: var(--bg-soft);
                                  outline: none; transition: border-color 0.15s;"
                           onfocus="this.style.borderColor='var(--danger)'"
                           onblur="this.style.borderColor='var(--border)'">
                    @error('password', 'userDeletion')
                        <p style="font-size: 13px; color: var(--danger); margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px; padding-top: 1rem; border-top: 1px solid var(--border);">
                    <button type="button"
                            x-on:click="$dispatch('close')"
                            style="padding: 9px 20px; border: 1px solid var(--border); border-radius: 9999px;
                                   font-size: 14px; font-weight: 500; color: var(--ink-muted); background: white; cursor: pointer;">
                        Batal
                    </button>
                    <button type="submit"
                            style="padding: 9px 20px; background: var(--danger); color: white; border: none;
                                   border-radius: 9999px; font-size: 14px; font-weight: 600; cursor: pointer;">
                        Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</section>