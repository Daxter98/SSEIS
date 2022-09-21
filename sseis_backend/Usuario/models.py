from sqlalchemy import Boolean, Column, Float, ForeignKey, Integer, String, Date, Time, null
from sqlalchemy.orm import relationship

from database import Base

class Usuario(Base):

    __tablename__ = "usuarios"

    id = Column(Integer, primary_key=True, index=True, autoincrement=True) # ID Usuario
    usuario = Column(String, nullable= False)
    password = Column(String, nullable= False)
    cargo = Column(String, nullable=True)
    nivel_acceso = Column(Integer, nullable=True)