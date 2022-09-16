from sqlalchemy import Boolean, Column, Float, ForeignKey, Integer, String, Date, Time, null
from sqlalchemy.orm import relationship

from database import Base

class Asunto(Base):

    __tablename__ = "Asuntos_pendientes"

    id = Column(Integer, primary_key=True, index=True, autoincrement=True) # No_Asunto
    idArea = Column(String, ForeignKey=True, nullable= False)
    Cve_estatus = Column(String, ForeignKey=True, nullable= False)
    Descripcion = Column(String, nullable= False)
    Prioridad = Column(String, nullable=True)
    Fecha_limite = Column(Date, nullable=True)
    Fecha_respuesta = Column(Date, nullable=True)
