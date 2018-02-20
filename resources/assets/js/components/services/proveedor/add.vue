<template>
  <p>
    <b-btn v-b-tooltip.hover title="Agregar Proveedor" variant="primary" size="sm" @click="showModal">
      <i class="material-icons">library_add</i>
    </b-btn>

    <b-modal ref="addProveedorModal" hide-footer title="Agregar Cliente">
      <b-form @submit.stop.prevent="handleSubmit">
        <b-form-group label="Nombre:">
            <b-form-input type="text"
                        placeholder="Ej: Siemens"
                        v-model="proveedor.nombre"></b-form-input>
            <div v-show="nombreValidate.isValid">
                <p class="text-danger"><small>{{ nombreValidate.text }}</small></p>
            </div>
        </b-form-group>

        <b-form-group label="Descripcion:">
            <b-form-input type="text"
                        placeholder="Ej: ........"
                        v-model="proveedor.descripcion"></b-form-input>
        </b-form-group>

        <b-form-group label="Descuento:">
            <b-form-input type="number"
                        placeholder="Ej: 5"
                        v-model="proveedor.descuento"></b-form-input>
        </b-form-group>

      </b-form>
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
      nombreValidate: {
          isValid: false,
          text: ''
      },
      proveedor: {
          nombre: '',
          direccion: '',
          descuento: 0
      }
    }
  },
  methods: {
    showModal () {
      this.$refs.addProveedorModal.show()
    },

    hideModal () {
      this.clear()
      this.$refs.addProveedorModal.hide()
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

    clear () {
      this.proveedor.nombre = ''
      this.proveedor.descripcion = ''
      this.proveedor.descuento = 0
    },

    save () {
      if (this.proveedor.nombre === '' || this.proveedor.nombre.length < 2) {
        this.nombreValidate.isValid = true
        this.nombreValidate.text = 'Este campo es requerido y necesita al menos 2 caracteres'
      } else {
        this.nombreValidate.isValid = false
        this.nombreValidate.text = ''
        this.add()
      }
    },
    
    add () {
      this.$http.post(this.url + '/proveedor', this.proveedor)
      .then(response => {
        bus.$emit('items', response.data)  
        this.hideModal()
        this.alertSuccess()
      }, response => {
        this.alertError()
      })
    }
  }
}
</script>
