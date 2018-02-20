<template>
  <p>
    <b-btn v-b-tooltip.hover title="Editar Cliente" variant="info" size="sm" @click="showModal">
      <i class="material-icons">edit</i>
    </b-btn>

    <b-modal ref="editClienteModal" hide-footer title="Editar Cliente">
      <b-form @submit.stop.prevent="handleSubmit">
        <b-form-group label="Nombre:">
            <b-form-input type="text"
                        placeholder="Ej: Systelec S.A"
                        v-model="cliente.nombre"></b-form-input>
            <div v-show="nombreValidate.isValid">
                <p class="text-danger"><small>{{ nombreValidate.text }}</small></p>
            </div>
        </b-form-group>
        

        <b-form-group label="Planta:">
            <b-form-input type="text"
                        placeholder="Ej: San Martin"
                        v-model="cliente.planta"></b-form-input>
        </b-form-group>

        <b-form-group label="Direccion:">
            <b-form-input type="text"
                        placeholder="Ej: 26 de Julio de 1890 5450"
                        v-model="cliente.direccion"></b-form-input>
        </b-form-group>

        <b-form-group label="Descripcion:">
            <b-form-input type="text"
                        placeholder="Ej: Soluciones integrales para las industrias"
                        v-model="cliente.descripcion"></b-form-input>
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
      cliente: {
          nombre: '',
          planta: '',
          direccion: '',
          descripcion: ''
      }
    }
  },
  props: [
    'item'
  ],
  created () {
    this.cliente = this.item
  },
  methods: {
    showModal () {
      this.$refs.editClienteModal.show()
    },

    hideModal () {
      this.$refs.editClienteModal.hide()
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
      this.cliente.nombre = ''
      this.cliente.planta = ''
      this.cliente.direccion = ''
      this.cliente.descripcion = ''
    },

    save () {
      if (this.cliente.nombre === '' || this.cliente.nombre.length < 2) {
        this.nombreValidate.isValid = true
        this.nombreValidate.text = 'Este campo es requerido y necesita al menos 2 caracteres'
      } else {
        this.nombreValidate.isValid = false
        this.nombreValidate.text = ''
        this.add()
      }
    },
    
    add () {
      this.$http.put(this.url + '/cliente/' + this.cliente.id, this.cliente)
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
