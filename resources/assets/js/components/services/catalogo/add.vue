<template>
  <p>
    <b-btn v-b-tooltip.hover title="Agregar Catalogo" variant="primary" size="sm" @click="showModal">
      <i class="material-icons">library_add</i>
    </b-btn>
    
    <b-modal ref="addCatalogoModal" hide-footer title="Agregar Catalogo">
      <file-upload :url='url' :thumb-url='thumbUrl' :headers="headers" @change="onFileChange"></file-upload>
    </b-modal>
  </p>
</template>

<script>
import swal from 'sweetalert2'
import { bus } from '../../../app.js'
import FileUpload from 'vue-upload-component/dist/vue-upload-component.part.js'
import axios from 'axios'

export default {
  data () {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
      },
      headers: {'access-token': '<your-token>'},
      filesUploaded: []
    }
  },
  components: {
    FileUpload,
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
      this.$http.post(this.url + '/proveedor/' + this.proveedor.id + '/catalogo', this.file )
      .then(response => {
        next();
        bus.$emit('subItems', response.data)  
        this.hideModal()
        this.alertSuccess()
      }, response => {
        this.alertError()
      })
    },

     onFileSelected (event) {
        const file = event.target.files[0];
        const formData = new FormData($("#my-form")[0]);
        //const formData = new FormData();
        //formData.append("my-file", file);
        Vue.http.post(`http://localhost/systelecerp/public/importExcel`, formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
            'X-CSRF-TOKEN': this.csrf
          }
        })
        .then(res => {
            //todo ok
        },
        error => {
            //todo mal :P
        })
    },

    thumbUrl (file) {
      return file.myThumbUrlProperty
    },
    
    onFileChange (file) {
      // Handle files like:
      this.fileUploaded = file
    }
  }
}
</script>
