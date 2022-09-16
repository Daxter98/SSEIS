import numbers
from sqlalchemy import Boolean, Column, ForeignKey, Integer, String, Float
from sqlalchemy.orm import relationship

from app.database import Base

class Alumnos(Base):
    Boleta = Column(String(10), primary_key = True)
    A_Paterno = Column(String(20), nullable=False)
    A_Materno = Column(String(20), nullable=False)
    Nombres = Column(String(30), nullable=False)
    PM = Column(String(32), nullable=False)
    Correo = Column(String(32))
    Correo_Tutor = Column(String(32)) 
    #Foto = Column(??)

class AlumnoInscrito(Alumnos):
    id_al = Column(Integer, primary_key = True)
    ciclo = Column(String(6), nullable=False)
    grupo = Column(String(5), nullable=False)
    carrera = Column(String(25), nullable=False)
    turno = Column(String(10), nullable=False)
    promedio = Column(Float, nullable=False)
    ua_inscritas = Column(Integer, nullable=False)


class Sanciones(Alumnos):
    folio_san = Column(Integer, primary_key = True)
    nivel = Column(String(10), nullable=False)
    sancion = Column(String(40), nullable=False)
    fecha_reporte = Column(String(10), nullable=False)
    observacion = Column(String(40))
    campo = Column(String(20), nullable=False)

class Normativa(Base):
    cve_normativa = Column(Integer, primary_key = True)
    ley = Column(String(10), nullable=False)
    articulo = Column(String(10), nullable=False)
    fraccion = Column(String(10), nullable=False)
    descripcion_nor = Column(String(60), nullable=False)
    abrev = Column(String(10))

class Tema_Incidencia(Normativa):
    cve_incidencia = Column(Integer, primary_key = True)
    descripcion_inc = Column(String(40), nullable=False)

class Incidencias(Tema_Incidencia, Alumnos):
    folio_inc = Column(Integer, primary_key = True)
    ciclo = Column(String(6), nullable=False)
    fecha = Column(String(10), nullable=False)
    hora = Column(String(5), nullable=False)
    hecho = Column(String(50), nullable=False)
    citatorio = Column(Boolean, nullable=False)
    quien_reporta = Column(String(20), nullable=False)
    observaciones = Column(String(40))

class Citatorio(Incidencias):
    id_cita = Column(Integer, primary_key = True)
    no_cita = Column(Integer, nullable=False)
    fecha_generada = Column(String(10), nullable=False)
    fecha_cita = Column(String(10), nullable=False)
    hora = Column(String(5), nullable=False)
    area_cita = Column(String(20), nullable=False)
    persona_atiende = Column(String(20), nullable=False)
    recibio_cita = Column(Boolean, nullable=False)
    acudio = Column(Boolean, nullable=False)

class Cred_Retenida(Alumnos):
    id_ret = Column(Integer, primary_key = True)
    fecha_reg = Column(String(10), nullable=False)
    motivo_ret = Column(String(30), nullable=False)
    observacion_ret = Column(String(40))
    fecha_entrega = Column(String(10), nullable=False)

class Sin_Credencial(Alumnos):
    id_sincr = Column(Integer, primary_key = True)
    fecha_solicitud = Column(String(10), nullable=False)
    motivo_sinc = Column(String(30), nullable=False)
    observacion_sinc = Column(String(40))
    fecha_entrega_sinc = Column(String(10), nullable=False)

class Cred_Olvidada(Alumnos):
    id_olv = Column(Integer, primary_key = True)
    fecha_olvido = Column(String(10), nullable=False)
    veces = Column(Integer, nullable=False)
