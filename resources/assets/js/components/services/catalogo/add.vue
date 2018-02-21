<template>
  <p>
    <b-btn v-b-tooltip.hover title="Agregar Catalogo" variant="primary" size="sm" @click="showModal">
      <i class="material-icons">library_add</i>
    </b-btn>
    
    <b-modal ref="addCatalogoModal" hide-footer title="Agregar Catalogo">
      <form enctype="multipart/form-data" id="my-form">
            <div class="form-group">
                <label class="btn btn-primary">
                    <i class="fa fa-folder-open-o" aria-hidden="true"></i>&nbsp;Seleccionar un archivo
                    <input type="file" accept=".pdf" @change="onFileSelected" name="myfile">
                </label>
            </div>
        </form>
      <b-btn variant="primary" @click="save()">Guardar</b-btn>
      <b-btn variant="danger" @click="hideModal()">Cerrar</b-btn>
    </b-modal>
  </p>
</template>

<script>
import swal from 'sweetalert2'
import { bus } from '../../../app.js'

export default {
  data () {
    return {
      url: 'http://localhost/systelecerp/public/api',
      file: null,
      fileValidate: {
          isValid: false,
          text: ''
      },
      proveedor: {
          id: 0,
          nombre: '',
          direccion: '',
          descuento: 0
      }
    }
  },
  props: [
    'item'
  ],
  created () {
    this.proveedor = this.item
  },
  methods: {
    clearFiles () {
      this.$refs.fileinput.reset();
    },

    showModal () {
      this.$refs.addCatalogoModal.show()
    },

    hideModal () {
      this.$refs.addCatalogoModal.hide()
    },

    alertError (error) {
      swal(
        'Registro fallido!',
        'Ocurrio un error al intentar guardar el registro en la base de datos. ' + error,
        'error'
      )
    },

    alertSuccess () {
      swal(
        'Registro exitoso!',
        'Se guardo con exito en la base de datos!',
        'success'
      )
    },

    save () {
      if (this.file) {
        this.add()
      } else {
        this.fileValidate.isValid = true
        this.fileValidate.text = 'Seleccione un archivo .xls'
      }
    },
    
    add () {
      this.$http.post(this.url + '/proveedor/' + this.proveedor.id + '/catalogo', this.file)
      .then(response => {
        bus.$emit('subItems', response.data)  
        this.hideModal()
        this.alertSuccess()
      }, response => {
        this.alertError()
      })
    },

    onFileSelected (event) {
        const file = event.target.files[0];
        const formData = new FormData($("#catalogo")[0]);
        this.$http.post(this.url + '/proveedor/' + this.proveedor.id + '/catalogo', formData)
        .then(res => {
            bus.$emit('subItems', response.data)  
        this.hideModal()
        this.alertSuccess()
        },
        error => {
            this.alertError()
        })
    }
  }
}
</script>
